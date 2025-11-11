import React, { useState } from "react";

export default function Megrendelesek() {
    const [searchId, setSearchId] = useState("");
    const [order, setOrder] = useState(null);
    const [error, setError] = useState("");

    const API_URL = "http://localhost:8000/api/megrendelesek";

    async function handleSearch(e) {
        e.preventDefault();

        if (searchId.trim() === "") {
            setError("Addja meg egy megrendelés ID-ját!");
            setOrder(null);
            return;
        }

        setError("");
        setOrder(null);

        try {
            const res = await fetch(`${API_URL}/${searchId}`);
            if (!res.ok) throw new Error("Nem található megrendelés");
            const data = await res.json();
            setOrder(data.data);
        } catch (err) {
            setError("Nincs ilyen megrendelés vagy hiba történt.");
        }
    }

    return (
        <div className="container" id="megrendelesek">
            <h1>Megrendelés lekérdezése</h1>
            <p className="subtitle">Addja meg a megrendelés ID-ját</p>

            <form className="search-bar" onSubmit={handleSearch}>
                <input
                    type="number"
                    placeholder="Megrendelés ID..."
                    value={searchId}
                    onChange={(e) => setSearchId(e.target.value)}
                />
                <button type="submit">Lekérés</button>
            </form>

            {error && <p className="error">{error}</p>}

            {order && (
                <div className="card">
                    <h2>Megrendelés #{order.id}</h2>
                    <p><strong>Ügyfél ID:</strong> {order.ugyfel_id}</p>
                    <p><strong>Állapot:</strong> {order.allapot}</p>
                    <p><strong>Rendelés dátuma:</strong> {order.rendeles_datum}</p>
                    <p><strong>Teljesítés dátuma:</strong> {order.teljesites_datum || "–"}</p>
                </div>
            )}
        </div>
    );
}