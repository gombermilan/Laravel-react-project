import React, { useState, useEffect } from "react";

export default function Szolgaltatasok() {
    const [searchName, setSearchName] = useState("");
    const [partner, setPartner] = useState(null);
    const [error, setError] = useState("");

    const API_URL = "http://localhost:8000/api/szolgaltatasok";

    async function handleSearch(e) {
        e.preventDefault();

        if (searchName.trim() === "") {
            setError("Addja meg egy ügyfél nevét!");
            setPartner(null);
            return;
        }

        setError("");
        setPartner(null);

        try {
            const res = await fetch(`${API_URL}?nev=${encodeURIComponent(searchName)}`);
            if (!res.ok) throw new Error("Nem található az ügyfél");
            const data = await res.json();
            setPartner(data.data || data);
        } catch (err) {
            setError("Nincs ilyen ügyfél vagy hiba történt.");
        }
    }

    return (
        <div className="container" id="ugyfelek">
            <h1>Ügyfelek</h1>
            <p className="subtitle">Keresés név alapján és adatok megtekintése</p>

            <form className="search-bar" onSubmit={handleSearch}>
                <input
                    type="text"
                    placeholder="Ügyfél neve..."
                    value={searchName}
                    onChange={(e) => setSearchName(e.target.value)}
                />
                <button type="submit">Keresés</button>
            </form>

            {error && <p className="error">{error}</p>}

            {partner && (
                <div className="card">
                    <h2>{partner.nev}</h2>
                    <p><strong>Email:</strong> {partner.email}</p>
                    <p><strong>Telefon:</strong> {partner.telefon}</p>
                    <p><strong>Cím:</strong> {partner.cim}</p>
                </div>
            )}

        </div>
    );
}