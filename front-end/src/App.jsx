import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import './App.css'
import AfficherEvenement from './pages/Evenement'
// import CreationEvenement from './pages/CreeEvenement'

function App() {
  const [count, setCount] = useState(0)

  return (
    <AfficherEvenement/>
    // <CreationEvenement/>
  )
}

export default App
