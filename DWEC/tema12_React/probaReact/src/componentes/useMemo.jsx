import React, { useState, useMemo } from 'react';

const Fibonacci = () => {
    const [number, setNumber] = useState(1);
    const fibonacciNumber = useMemo(() => {
        if (number === 1 || number == 2) {
            return 1;
        } else {
            let prev = 1;
            let curr = 1;
            for (let i = 3; i <= number; i++) {
                const next = prev + curr;
                prev = curr;
                curr = next;
            }
            console.log("Entrado ")
            return curr;
        }
    }, [number]);

    return (
        <div>
            <h2>Suite de Fibonacci de {number}:{fibonacciNumber}</h2>
            <input type="number"
                value={number}
                onChange={(e) => setNumber(parseInt(e.target.value))} />
        </div>
    );
};

export default Fibonacci;
