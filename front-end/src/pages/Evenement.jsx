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

      // Compatible avec :
      // response.data = [...]
      // ou response.data = { data: [...] }
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
}

export default AfficherEvenement;
