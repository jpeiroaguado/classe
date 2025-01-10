import React, { useState, createContext } from "react";
// import { CartContext,CartContextProvider} from './Cart_Context';

export const CartContext = createContext([]);

export const ShoppingList = (props) => {
  const [cartItems, setCartItems] = useState([]);

  const listStyle = {
    border: "1px solid black",
    margin: "1rem",
    width: "160px",
    height: "150px"
  };

  const items = [
    { name: "Shoes", price: "$20", id: 0 },
    { name: "Clothes", price: "$30", id: 1 },
    { name: "Deodrant", price: "$40", id: 2 }
  ];

  const addItem = (id, name, price) => {
    cartItems.push({ id, name, price });
    setCartItems([...cartItems]);
  };

  let displayItems = items.map((producto) => {
    return (
      <div style={listStyle} key={producto.id}>
        <h2>{producto.name}</h2>
        <h2>{producto.price}</h2>
        <button onClick={() => addItem(producto.id, producto.name, producto.price)}>
          Add
        </button>
      </div>
    );
  });

  return (
    <CartContext.Provider value={{cartItems, setCartItems}}>
      <div style={{ display: "flex", justifyContent: "space-between" }}>
        <div>
          <h1>Shopping List</h1>
          {displayItems}
        </div>
        <div>{props.children}</div>
      </div>
    </CartContext.Provider>
  );
};

// export default ShoppingList;
