import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  products: [],
  cart: [],
};

const productsSlice = createSlice({
  name: "product",
  initialState,
  reducers: {
    addProductToCart: (state, action) => {
      state.cart.push(action.payload)
    },
    removeLastProduct: (state, action) => {
      state.cart.pop();
    },
  },
});

export const { addProductToCart, removeLastProduct} = productsSlice.actions;/*,   se le podria poner para devolver también el slice de removeLast*/

export default productsSlice.reducer;
