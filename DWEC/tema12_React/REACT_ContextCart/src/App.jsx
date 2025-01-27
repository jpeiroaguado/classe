import React from "react";
import "./styles.css";
import { ShoppingList } from "./List";
import ShoppingCart from "./Cart";

export default function App() {
  return (
    <div className="App">
      <div>
        <ShoppingList>
          <ShoppingCart />
          <h1>Hola intruso</h1>
        </ShoppingList>
      </div>
    </div>
  );
}
