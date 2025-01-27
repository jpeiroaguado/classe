

import './App.css'


import { createBrowserRouter, RouterProvider, Outlet, Link } from "react-router-dom";
const Layout = () => {
 return (
 <>
 <nav>
 <ul>
 <li>
 <Link to="/">Home</Link>
 </li>
 <li>
 <Link to="/blogs">Blogs</Link>
 </li>
 <li>
 <Link to="/contact">Contact</Link>
 </li>
 </ul>
 </nav>
 <Outlet />
 </>
 );
};
const Home = () => <h1>Home</h1>;
const Blogs = () => <h1>Blogs</h1>;
const Contact = () => <h1>Contact</h1>;
const NoPage = () => <h1>404 - Page Not Found</h1>;
// Crear el enrutador con createBrowserRouter !! CAMBIO React Router v 6.4.
const router = createBrowserRouter([
 {
 path: "/",
 element: <Layout />,
 children: [
 { index: true, element: <Home /> }, // Ruta principal
 { path: "blogs", element: <Blogs /> },
 { path: "contact", element: <Contact /> },
 { path: "*", element: <NoPage /> }, // Ruta para manejar páginas no encontradas
 ],
 },
]);
const App = () => {
  return (
  <RouterProvider router={router} />
  );
 };
 export default App;
