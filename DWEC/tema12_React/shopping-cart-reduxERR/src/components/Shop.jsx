import React, { useEffect, useState } from "react";
import axios from "axios";
import { useDispatch } from "react-redux";
import { addProductToCart } from "../redux/productsSlice";

const Shop = () => {
  const [products, setProducts] = useState([]);
  const dispatch = useDispatch();

  const getProducts = async () => {
    const fakeProducts = [
      { id: 1, title: "Patata", price: 25, image: "https://cookifi.com/blog/wp-content/uploads/2018/06/potato-hd-png-potato-png-1707.png" },
      { id: 2, title: "Pepino", price: 30, image: "https://www.infoescola.com/wp-content/uploads/2010/08/pepino_769056490.jpg" }
    ];
    
      setProducts(fakeProducts);
  };
  /*const getProducts = async () => {
    // Aquí generamos productos falsos como datos simulados
    
  await axios
      .get("https://fakestoreapi.com/products")
      .then((res) => setProducts(res.data))
      .catch((err) => console.log(err));
      
    // Actualizamos el estado de productos con los datos simulados
    
  };*/
  useEffect(() => {
    getProducts();
  }, []);
  return (
    <section className="shop">
      {products.map((product) => (
        <article className="card" key={product.id}>
          <img src={product.image} alt="" />
          <div className="details-div">
            <div className="title-price">
              <p>{product.title}</p>
              <p>{product.price}</p>
            </div>
            <button
              onClick={() =>
                dispatch(
                  addProductToCart({
                    id: product.id,
                    title: product.title,
                    price: product.price,
                    image: product.image,
                  })
                )
              }
            >
              Add to cart
            </button>
          </div>
        </article>
      ))}
    </section>
  );
};

export default Shop;
