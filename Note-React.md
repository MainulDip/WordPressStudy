### Immediate State Update Dependency | Asynchronous State Update:
React states are updated asynchronously. So just after the `setState` call the state will not update immediately. Better way to use setState's `Functional Update` or `useEffect` with that state as dependency.

```js
const handleIncrement = () => {
    setCount(count + 1);
    console.log(count); // This will log the old value of count
};

 const handleIncrement = () => {
    setCount((prevCount) => {
      const newCount = prevCount + 1;
      console.log(newCount); // This will log the updated value of count
      return newCount;
    });
};
```

### `!!` in js:
Casting truthy or falsy values to actual `true` or `false`
https://stackoverflow.com/questions/29312123/how-does-the-double-exclamation-work-in-javascript