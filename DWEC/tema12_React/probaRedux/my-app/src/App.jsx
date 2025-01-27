import Cart from "./components/Cart";
import { store } from "./redux/store.jsx";
import { Provider } from "react-redux";
function App() {
 return (
 <Provider store={store}>
 <Cart />
 </Provider>
 );
}
export default App;
