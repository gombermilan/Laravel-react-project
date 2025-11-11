function Layout({ children }) {
    return (
        <div className="layout">
            <header className="header">
                <a href="#szolgaltatasok">Szolgáltatások</a>
                <a href="#megrendelesek">Megrendelések</a>
                <a href="#ugyfelek">Ügyfelek</a>
            </header>

            <section className="banner">
                <h1 className="banner-title">GuitarShop</h1>
            </section>

            <main className="main">{children}</main>

            <footer className="footer">©Gombér Milán</footer>
        </div>
    );
}

export default Layout;