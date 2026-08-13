import React, { useEffect, useState } from "react";
import api from "../api/axios";

const AfficherEvenement = () => {
  const [events, setEvents] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  useEffect(() => {
    fetchEvents();
  }, []);

  const fetchEvents = async () => {
    try {
      const response = await api.get("/AfficherEvenement");

      console.log("API Response :", response.data);

    
      const data = Array.isArray(response.data)
        ? response.data
        : response.data.data || [];

      setEvents(data);
    } catch (err) {
      console.error("Erreur API :", err);
      console.error("Erreur serveur :", err.response?.data);

      setError("Impossible de récupérer les événements.");
    } finally {
      setLoading(false);
    }
  };

  // Chargement
  if (loading) {
    return (
      <div className="flex min-h-screen items-center justify-center bg-gray-100">
        <div className="text-center">
          <div className="mb-4 text-4xl">⏳</div>

          <h2 className="text-xl font-semibold text-blue-600">
            Chargement...
          </h2>
        </div>
      </div>
    );
  }

  // Erreur
  if (error) {
    return (
      <div className="flex min-h-screen items-center justify-center bg-gray-100 px-4">
        <div className="rounded-xl bg-red-100 px-6 py-5 text-center">
          <p className="font-semibold text-red-600">
            {error}
          </p>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-100 px-6 py-10">

      {/* Titre */}
      <div className="mx-auto mb-10 max-w-6xl">
        <h1 className="text-center text-4xl font-bold text-gray-800">
          Liste des événements
        </h1>

        <p className="mt-2 text-center text-gray-500">
          Découvrez les événements disponibles
        </p>
      </div>

      {/* Aucun événement */}
      {events.length === 0 ? (
        <div className="mx-auto max-w-md rounded-xl bg-white p-8 text-center shadow-md">
          <div className="mb-3 text-4xl">📅</div>

          <p className="text-lg font-medium text-gray-500">
            Aucun événement trouvé.
          </p>
        </div>
      ) : (

        <div className="mx-auto grid max-w-6xl gap-6 sm:grid-cols-2 lg:grid-cols-3">

          {events.map((event) => (
            <article
              key={event.id || event.id_evenement}
              className="group flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-slate-200 hover:shadow-xl"
            >

              <div>


                <div className="flex items-start justify-between gap-4">

                  <h2 className="text-xl font-bold text-slate-900 transition-colors group-hover:text-indigo-600">
                    {event.title || event.nom || "Événement sans titre"}
                  </h2>

                  {


                      <span className="shrink-0 rounded-full bg-indigo-50 px-3 py-1 text-sm font-bold text-indigo-700">
                        {event.prix} DHS
                      </span>
                    }
                </div>

                {/* Informations */}
                <div className="mt-6 space-y-3 text-sm font-medium text-slate-600">

                  {/* Date */}
                  {(event.date) && (
                    <div className="flex items-center gap-2.5">
                      <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">
                        📅
                      </span>

                      <span>
                        {event.date}
                      </span>
                    </div>
                  )}

                  {/* Heure */}
                  {event.heure && (
                    <div className="flex items-center gap-2.5">
                      <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">
                        ⏰
                      </span>

                      <span>
                        {event.heure}
                      </span>
                    </div>
                  )}

                  {/* Lieu */}
                  {event.lieu && (
                    <div className="flex items-center gap-2.5">
                      <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">
                        📍
                      </span>

                      <span className="truncate">
                        {event.lieu}
                      </span>
                    </div>
                  )}

                  {/* Nombre de places */}
                  {(event.maxPlaces) && (
                    <div className="flex items-center gap-2.5">
                      <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">
                        👥
                      </span>

                      <span>
                        {event.maxPlaces} places max
                      </span>
                    </div>
                  )}

                </div>
              </div>

              {/* Bouton */}
              <div className="mt-8 border-t border-slate-100 pt-4">
                <button
                  type="button"
                  className="w-full rounded-xl bg-slate-900 py-3 text-center text-sm font-semibold text-white transition-all hover:bg-indigo-600 active:scale-[0.98]"
                >
                  Voir le détail
                </button>
              </div>

            </article>
          ))}

        </div>
      )}

    </div>
  );
};

export default AfficherEvenement;
