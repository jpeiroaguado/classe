function Noa(props){/* Se puede pasar directamente el nombre de los props y luego no tendrias 
  que poner PE {props.moto}, solo {moto}, solo sirve en ocmponentes padre/descendiente y son variables locales*/
  return(
    <>
      <div>Tabula {props.moto}</div>
      <div>Centinela {props.coche}</div>
      <Victor moto={moto}/>
    </>
  )
}

export default Noa;