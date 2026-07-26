Voici un fichier **README.md** structuré et complet, rédigé en Markdown et intégrant l'ensemble du contexte, des règles métier, des diagrammes UML et du modèle relationnel fournis.

---

# 🎟️ Plateforme de Gestion d'Événements & Pass Étudiant (BDE)

## 📌 Context du projet

Ce projet consiste en une plateforme web permettant au Bureau Des Étudiants (BDE) d'organiser et gérer des événements universitaires, et aux étudiants de réserver des places et consulter leur ticket d'accès (Pass Étudiant) sous forme numérique.

---

## 🚀 Épics & User Stories

### 🎯 Épic 1 : Gestion des Événements (Dashboard Admin - BDE)

* **US 1.1 : Création d'un événement**
* **En tant que** membre de l'équipe BDE (Administrateur),
* **Je veux** créer un nouvel événement en remplissant un formulaire (*titre, description, date, heure, lieu, prix et jauge maximale de places*),
* **Afin de** le rendre visible et ouvert aux inscriptions sur la plateforme.
* **Critères d'acceptation :**
* Seuls les utilisateurs ayant le rôle `admin` (BDE) ont accès à l'espace `/admin/events/create`.
* La capacité maximale (`maxPlaces`) doit être un entier positif supérieur à 0.




* **US 1.2 : Suivi des capacités et des réservations**
* **En tant que** membre du BDE,
* **Je veux** visualiser sur mon tableau de bord le nombre de places restantes en temps réel pour chaque événement,
* **Afin d'** adapter la communication ou de prévoir la logistique nécessaire.



---

### 🎟️ Épic 2 : Réservation & Espace Étudiant

* **US 2.1 : Inscription en un clic à un événement gratuit**
* **En tant qu'** étudiant connecté,
* **Je veux** cliquer sur le bouton **"S'inscrire"** depuis la fiche d'un événement gratuit,
* **Afin de** réserver immédiatement ma place sans passer par un tunnel de paiement.
* **Critères d'acceptation :**
* Le système vérifie que l'événement n'est pas complet (*nombre d'inscrits < jauge max*) avant de valider.
* Un étudiant ne peut pas s'inscrire deux fois au même événement.





---

### 📑 Épic 3 : Le Générateur de Tickets (Le Pass Étudiant)

* **US 3.1 : Génération et consultation du ticket de réservation**
* **En tant qu'** étudiant inscrit à un événement,
* **Je veux** accéder à mon profil dans l'espace **"Mes Billets"**,
* **Afin de** visualiser mon pass numérique contenant un numéro de réservation unique.
* **Critères d'acceptation :**
* Le numéro de réservation est généré de manière unique et non prévisible (*ex: `BDE-2026-XXXXX*`).
* Le pass affiche clairement : le titre de l'événement, la date, l'heure, le lieu et le nom de l'étudiant.





---

## 📊 Conception & Architecture

### 1. Diagramme de Cas d'Utilisation (Use Case Diagram)

```
                  +----------------------------------------------------+
                  |                Plateforme BDE                      |
                  |                                                    |
   ( Admin ) ---->|-- (Créer un nouvel événement) --<<include>>------+   |
     |            |-- (Consultation du tableau de bord)-<<include>>--|   |
     |            |-- (Visualiser les places restantes)-<<include>>--|   |
     |            |-- (Consulter les réservations) -----<<include>>--|   |
                  |                                                  v   |
                  |                                          (Se connecter)
                  |                                                  ^   |
   ( Étudiant ) ->|-- (Consulter les événements) -------<<include>>--|   |
                  |-- (Voir la fiche d'un événement) ---<<include>>--|   |
                  |-- (S'inscrire à un événement gratuit)<<include>>--|   |
                  |-- (Vérifier les places disponibles) -<<include>>--|   |
                  |-- (Vérifier si déjà inscrit) -------<<include>>--+   |
                  +----------------------------------------------------+

```

---

### 2. Diagramme de Classes (UML Class Diagram)

| Classe | Attributs | Méthodes / Opérations |
| --- | --- | --- |
| **`User`** | `+ id: int`<br>

<br>`+ nom: String`<br>

<br>`+ email: String (unique)`<br>

<br>`+ password: String`<br>

<br>`+ role_user: String` | `+ CreeEvenement()`<br>

<br>`+ ReserverEvent()`<br>

<br>`+ SupprimerEvent()`<br>

<br>`+ AfficherTicketReservations()` |
| **`événement`** | `+ id: int`<br>

<br>`+ title: String`<br>

<br>`+ description: String`<br>

<br>`+ date: Date`<br>

<br>`+ heure: Time`<br>

<br>`+ lieu: String`<br>

<br>`+ prix: Decimal`<br>

<br>`+ maxPlaces: int` |  |
| **`réservation`** | `+ id_reservation: String (unique)` |  |

* **Relations :**
* `User` **1** ------- **1..*** `réservation` *(Un utilisateur peut effectuer une ou plusieurs réservations)*.
* `événement` **1** ◆------- **1..*** `réservation` *(Composition : Une réservation dépend directement d'un événement)*.



---

### 3. Modèle Physique / Relational Database Schema (MLD / MPD)

```sql
User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_user VARCHAR(50) NOT NULL
);

evenement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    lieu VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    maxPlaces INT NOT NULL
);

reservation (
    id_reservation VARCHAR(100) PRIMARY KEY, -- ex: BDE-2026-XXXXX (Unique)
    user_id INT NOT NULL,
    evenement_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE,
    FOREIGN KEY (evenement_id) REFERENCES evenement(id) ON DELETE CASCADE,
    CONSTRAINT unique_user_event UNIQUE (user_id, evenement_id)
);

```

---

## ⚙️ Directives de Sécurité & Validation Metier

1. **Authentification & Droits d'Accès :**
* L'accès aux routes `/admin/*` est strictement réservé au rôle `admin`.
* L'inscription nécessite un compte étudiant authentifié (`role_user = 'etudiant'`).


2. **Garantie d'Unicité de la Réservation :**
* Une clé unique composée de `(user_id, evenement_id)` empêche la double réservation en base de données.
* La clé primaire `id_reservation` doit être générée à l'aide d'un algorithme pseudo-aléatoire sécurisé (ex: `UUID` ou format formaté `BDE-2026-XXXXX`).
