import './App.css';
import Layout from "./components/layout";
import Megrendelesek from './components/megrendeles';
import Szolgaltatasok from './components/szolgaltatas';
import Ugyfelek from './components/ugyfel';

function App() {
  return (
    <Layout>
      <Szolgaltatasok></Szolgaltatasok>
      <Megrendelesek></Megrendelesek>
      <Ugyfelek></Ugyfelek>
    </Layout>
  );
}



export default App;