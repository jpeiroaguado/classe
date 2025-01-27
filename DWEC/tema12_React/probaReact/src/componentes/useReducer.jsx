import React, { useReducer } from 'react';

// devuelve un nuevo estado en función del dispatch (entrega/envío) 
const reducer = (state, action) => {
    switch (action.type) {
        case 'incrementar':
            return { count: state.count + 1 } // devuelve el nuevo estado {count : valor}
        case 'decrementar':
            return { count: state.count - 1 } // devuelve el nuevo estado {count : valor}
        case 'duplicar':
            return { count: state.count * 2 } // devuelve el nuevo estado {count : valor}
        case 'reinicializar':    
            return { count: 0 } // devuelve el nuevo estado {count : valor}
        default:
            return state;
    }
};

const initialState = { count: 0 };
const Counter = () => {
    const [state, dispatch] = useReducer(reducer, initialState);
   // const [state, dispatch] = useReducer(reducer, {count:0});

    return (
        < div >
            <h2>Contador: {state.count}</h2>
            <button onClick={() => dispatch({ type: 'incrementar' })}>Incrementar</button>
            <button onClick={() => dispatch({ type: 'decrementar' })}>Decrementar</button>
            <button onClick={() => dispatch({ type: 'duplicar' })}>Duplicar</button>
            <button onClick={() => dispatch({ type: 'reinicializar' })}>Reinicializar</button>
        </div >
    )
}

export default Counter;