import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import { MemberTable } from './MemberTable';
import { Modax } from './Modax';



try {
  ReactDOM.render(
    <MemberTable />,
    document.getElementById('memberTable')
  )
} catch (error) {
  console.log(error);
}

try {
  ReactDOM.render(
    <Modax title={"SUCCESS"} copy={"Member added successfully"} icon={"✔️"} />,
    document.getElementById('recordSuccess')
  )
} catch (error) {
  
}

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
