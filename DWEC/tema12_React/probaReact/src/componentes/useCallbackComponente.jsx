import { useState, useCallback } from "react";

function Counter() {

  const [count, setCount] = useState(0);
  const increment = useCallback(() => {
    setCount(count + 1);
  }, [count]);
  const decrement = useCallback(() => {
    setCount(count - 1);
  }, [count]);

  return (
    <div>
      <h1>You have {count} centinelas</h1>
      <button onClick={increment}>Click to add Oh yea "Obscene noises" </button>
      <br /> <br />
      <button onClick={decrement}>Click to substract Pfff maggot" </button>
    </div>
  );
}

export default Counter;
