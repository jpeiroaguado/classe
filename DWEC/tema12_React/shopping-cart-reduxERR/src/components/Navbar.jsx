import React from "react";
import { CiShoppingCart } from "react-icons/ci";
import { useSelector } from "react-redux";

const Navbar = () => {
  const cart = useSelector((state) => state.products.cart);
  const count = cart.length;
  return (
    <nav>
      <p>SHOP</p>
      <div>
        <CiShoppingCart className="icon" />
        <span>{count}</span>
      </div>
    </nav>
  );
};

export default Navbar;
