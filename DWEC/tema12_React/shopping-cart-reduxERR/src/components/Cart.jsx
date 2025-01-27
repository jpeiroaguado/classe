import React from "react";
import { useSelector } from "react-redux";
import { removeLastProduct } from "../redux/productsSlice";
import { useDispatch } from "react-redux";

const Cart = () => {
  const cart = useSelector(state => state.products.cart);
  const dispatch = useDispatch();


  return (
    <section className="cart-component">
      {cart.map((product) => (
        <article className="cart-card" key={product.id}>
          <div>
            <img src={product.image} alt="" />
          </div>
          <div>
            <p>{product.title}</p>
            <p>$:{product.price}</p>
          </div>
          <div>
            <button
              onClick={() =>
                dispatch(
                  removeLastProduct(
                    product.id
                  )
                )
              }
            >
              Remove from Cart
            </button>
          </div>
        </article>
      ))}
      ;
    </section>
  );
};

export default Cart;
