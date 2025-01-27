import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { addToCart, removeFromCart } from "../redux/cartSlice";
const Cart = () => {
 const cart = useSelector((state) => state.cart);
 const dispatch = useDispatch();
 const handleAddtoCart = item => {
 dispatch(addToCart(item));
 }
 const handleremoveFromCart = item => {
 dispatch(removeFromCart(item));
 }
 return (
 <div>
 <h2>Shopping Cart</h2>
 {cart.map((item) => (
 <div key={item.id}>
 <p>{item.name}</p>
 <button onClick={() => handleremoveFromCart(item)}>Eliminar del carrito</button>
 </div>
 ))}

 <h2>Products</h2>
 {['Manzanas', 'Plátanos', 'Naranjas'].map((item, index) => (
 <div key={index}>
 <p>{item}</p>
 <button onClick={() =>
 handleAddtoCart({ id: index, name: item })}>Añadir al carrito</button>
 </div>))}
 </div>
 );
};
export default Cart;