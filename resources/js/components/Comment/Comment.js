import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';



export default function Comment (props) {
    const { id, name, comments } = props
    // const [count, setCount] = useState(0)


    return (
    //   <button onClick={() => setCount(count + 1)} className={styleBtnArr[typeBtn]}>{button} {count}</button>
                //   <div className="container">
                <blockquote className="blockquote mt-3" key={id}>
                    <p className="mb-0 h6">{comments}</p>
                    <footer className="blockquote-footer text-right">{name} <cite title="Source Title">(Publish date: today)</cite></footer>
                </blockquote>
            // </div>
    )
  };

//   export default class Comment extends Component {
//     render() {
//         return (
//             <div className="container">
//                 <blockquote className="blockquote mt-3">
//                     <p className="mb-0 h6">Title</p>
//                     <footer className="blockquote-footer text-right">Text <cite title="Source Title">(Publish date: today)</cite></footer>
//                 </blockquote>
//             </div>
//         );
//     }
// }
