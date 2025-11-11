import React, { useState, useEffect } from "react";

export default function Szolgaltatasok() {
    const [searchName, setSearchName] = useState("");
    const [service, setService] = useState(null);
    const [error, setError] = useState("");

    const API_URL = "http://localhost:8000/api/szolgaltatasok";

    async function handleSearch(e) {
        e.preventDefault();

        if (searchName.trim() === "") {
            setError("Addja meg egy szolgáltatás nevét!");
            setService(null);
            return;
        }

        setError("");
        setService(null);

        try {
            const res = await fetch(`${API_URL}/${searchName}`);
            if (!res.ok) throw new Error("Nem található a szolgáltatás");
            const data = await res.json();
            setService(data.data);
        } catch (err) {
            setError("Nincs ilyen szolgáltatás vagy hiba történt.");
        }
    }

    return (
        <div className="container" id="szolgaltatasok">
            <h1>Szolgáltatások</h1>
            <p className="subtitle">Keresés név alapján és adatok megtekintése</p>

            <form className="search-bar" onSubmit={handleSearch}>
                <input
                    type="text"
                    placeholder="Szolgáltatás neve..."
                    value={searchName}
                    onChange={(e) => setSearchName(e.target.value)}
                />
                <button type="submit">Keresés</button>
            </form>

            {error && <p className="error">{error}</p>}

            {service && (
                <div className="card">
                    <h2>{service.nev}</h2>
                    <p><strong>Leírás:</strong> {service.leiras}</p>
                    <p><strong>Ár:</strong> {service.ar}Ft</p>
                </div>
            )}

        </div>
    );
}