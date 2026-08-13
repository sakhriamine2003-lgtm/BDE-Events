import { useState } from "react";
import api from "../api/axios";

const initialForm = {
    title: "",
    date: "",
    heure: "",
    lieu: "",
    prix: "",
    maxPlaces: "",
};

const CreationEvenement = () => {
    const [form, setForm] = useState(initialForm);
    const [message, setMessage] = useState("");
    const [loading, setLoading] = useState(false);

    const handleChange = (e) => {
        setForm({
            ...form,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setMessage("");

        try {
            await api.post("/CreatonEvenement", form);
            setMessage("Événement créé avec succès !");
            setForm(initialForm);

        } catch (err) {
            setMessage(
                "Une erreur est survenue lors de la création.",

            );
        } finally {
            setLoading(false);
        }
    };





    return (
        <div className="bg-slate-100 min-h-screen flex items-center justify-center p-4 text-slate-800">
            <div className="bg-white w-full max-w-2xl p-6 sm:p-10 rounded-2xl shadow-xl border border-slate-200">

                {/* En-tête */}
                <div className="text-center mb-8">
                    <div className="inline-flex items-center justify-center w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl mb-3 text-2xl">
                        📅
                    </div>
                    <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900">
                        Ajouter un Événement
                    </h2>
                    <p className="text-slate-500 text-sm mt-1">
                        Remplissez les détails ci-dessous pour publier un nouvel événement.
                    </p>
                </div>

                {/* Message d'état (Succès / Erreur) */}
                {/* Message d'état (Succès / Erreur) */}
                {message && (
                    <div
                        className={`mb-4 p-3 rounded-xl border text-sm font-medium ${message === "Événement créé avec succès !"
                                ? "bg-green-50 border-green-200 text-green-600"
                                : "bg-red-50 border-red-200 text-red-600"
                            }`}
                    >
                        {message}
                    </div>
                )}

                <form onSubmit={handleSubmit} className="space-y-6">
                    {/* Titre */}
                    <div>
                        <label className="block text-sm font-bold mb-2">Titre</label>
                        <input
                            type="text"
                            name="title"
                            value={form.title}
                            onChange={handleChange}
                            placeholder="Ex: Conférence Tech 2026"
                            className="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3"
                            required
                        />
                    </div>

                    {/* Date & Heure */}
                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label className="block text-sm font-bold mb-2">Date</label>
                            <input
                                type="date"
                                name="date"
                                value={form.date}
                                onChange={handleChange}
                                className="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3"
                                required
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-bold mb-2">Heure</label>
                            <input
                                type="time"
                                name="heure"
                                value={form.heure}
                                onChange={handleChange}
                                className="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3"
                                required
                            />
                        </div>
                    </div>

                    {/* Lieu */}
                    <div>
                        <label className="block text-sm font-bold mb-2">Lieu</label>
                        <input
                            type="text"
                            name="lieu"
                            value={form.lieu}
                            onChange={handleChange}
                            placeholder="Ex: ENAA Béni Mellal"
                            className="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3"
                            required
                        />
                    </div>

                    {/* Prix & Places */}
                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label className="block text-sm font-bold mb-2">Prix (DH)</label>
                            <input
                                type="number"
                                name="prix"
                                value={form.prix}
                                onChange={handleChange}
                                min="0"
                                step="0.01"
                                placeholder="0.00"
                                className="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3"
                                required
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-bold mb-2">Places Maximum</label>
                            <input
                                type="number"
                                name="maxPlaces"
                                value={form.maxPlaces}
                                onChange={handleChange}
                                min="1"
                                placeholder="100"
                                className="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3"
                                required
                            />
                        </div>
                    </div>

                    {/* Bouton de validation */}
                    <button
                        type="submit"
                        disabled={loading}
                        className="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 px-6 rounded-xl disabled:opacity-50 transition-colors"
                    >
                        {loading ? "Création en cours..." : "➕ Ajouter l'événement"}
                    </button>
                </form>
            </div>
        </div >
    );
};

export default CreationEvenement;
