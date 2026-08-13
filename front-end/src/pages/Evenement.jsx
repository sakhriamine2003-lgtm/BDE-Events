

// import React, { useEffect, useState } from "react";
// import api from "../api/axios";
// import '../App.css'

// const Evenement = () => {
//   const [events, setEvents] = useState([]);
//   const [loading, setLoading] = useState(true);
//   const [error, setError] = useState("");

//   useEffect(() => {
//     fetchEvents();
//   }, []);

//   const fetchEvents = async () => {
//     try {
//       const response = await api.get("/Evenements");

// //       console.log("API Response :", response.data);

//       setEvents(response.data);
//     } catch (error) {
//       console.error("Erreur :", error);
//       setError("Impossible de récupérer les événements.");
//     } finally {
//       setLoading(false);
//     }
//   };

//   if (loading) {
//     return (
//       <div className="flex min-h-screen items-center justify-center bg-gray-100">
//         <h2 className="text-xl font-semibold text-blue-600">
//           Chargement...
//         </h2>
//       </div>
//     );
//   }

//   if (error) {
//     return (
//       <div className="flex min-h-screen items-center justify-center bg-gray-100">
//         <h2 className="rounded-lg bg-red-100 px-6 py-4 font-semibold text-red-600">
//           {error}
//         </h2>
//       </div>
//     );
//   }

//   return (
//     <div className="min-h-screen bg-gray-100 px-6 py-10">
//       
//       {/* Titre */}
//       <div className="mx-auto mb-10 max-w-6xl">
//         <h1 className="text-center text-4xl font-bold text-gray-800">
//           Liste des événements
//         </h1>

//         <p className="mt-2 text-center text-gray-500">
//           Découvrez les événements disponibles
//         </p>
//       </div>

//       {/* Aucun événement */}
//       {events.length === 0 ? (
//         <div className="mx-auto max-w-md rounded-xl bg-white p-8 text-center shadow-md">
//           <p className="text-lg text-gray-500">
//             Aucun événement trouvé.
//           </p>
//         </div>
//       ) : (
//         /* Liste des événements */
//         <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
//           {events.map((event) => (
//             <article
//               key={event.id}
//               className="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-slate-200"
//             >
//               <div>
//                 {/* En-tête de la carte : Titre & Prix */}
//                 <div className="flex items-start justify-between gap-4">
//                   <h2 className="text-xl font-bold text-slate-900 transition-colors group-hover:text-indigo-600">
//                     {event.title}
//                   </h2>
//                   {event.prix && (
//                     <span className="shrink-0 rounded-full bg-indigo-50 px-3 py-1 text-sm font-bold text-indigo-700">
//                       {event.prix} DHS
//                     </span>
//                   )}
//                 </div>

//                 {/* Détails de l'événement */}
//                 <div className="mt-6 space-y-3 text-sm font-medium text-slate-600">
//                   {event.date && (
//                     <div className="flex items-center gap-2.5">
//                       <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">📅</span>
//                       <span>{event.date}</span>
//                     </div>
//                   )}

//                   {event.heure && (
//                     <div className="flex items-center gap-2.5">
//                       <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">⏰</span>
//                       <span>{event.heure}</span>
//                     </div>
//                   )}

//                   {event.lieu && (
//                     <div className="flex items-center gap-2.5">
//                       <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">📍</span>
//                       <span className="truncate">{event.lieu}</span>
//                     </div>
//                   )}

//                   {event.maxPlaces && (
//                     <div className="flex items-center gap-2.5">
//                       <span className="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">👥</span>
//                       <span>{event.maxPlaces} places max</span>
//                     </div>
//                   )}
//                 </div>
//               </div>

//               {/* Bouton d'action */}
//               <div className="mt-8 pt-4 border-t border-slate-100">
//                 <button className="w-full rounded-xl bg-slate-900 py-3 text-center text-sm font-semibold text-white transition-all hover:bg-indigo-600 active:scale-[0.98]">
//                   Voir le détail
//                 </button>
//               </div>
//             </article>
//           ))}
//         </div>
//       )}
//     </div>
// );
// }


