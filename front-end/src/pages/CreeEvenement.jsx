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





    
};

export default CreationEvenement;
