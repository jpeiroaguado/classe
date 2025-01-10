import React, { useContext  } from "react";
import { CartContext } from "./List";

const ShoppingCart = () => {
  const value = useContext(CartContext);//<CartContext.Provider value={{cartItems, setCartItems}}>

  const cartStyle = {
    display: "flex",
    margin: "1rem",
    justifyContent: "space-between",
    borderBottom: "1px solid grey"
  };

  const deleteItem = (idItem) => {
    const cartItemsActualizada=value.cartItems.filter(item=>item.id !==idItem);
    value.setCartItems(cartItemsActualizada)
  };

  let displayCartItems = value.cartItems.map((cur) => {
    return (
      <div style={cartStyle} key={cur.id}>
        <h2> {cur.name} </h2>
        <h2> {cur.price} </h2>
        <button style={{ height: "60px" }} onClick={() => deleteItem(cur.id)}>
          Delete
        </button>
      </div>
    );
  });

  return (
    <>
      <h1>Shopping Cart </h1>
      {displayCartItems}
    </>
  );
};

export default ShoppingCart;
