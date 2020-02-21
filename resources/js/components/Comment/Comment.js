import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';



export default function Comment(props) {
    const { id, name, comments, handleDelete, created_at, i } = props
    // const [count, setCount] = useState(0)


    return (
        //   <button onClick={() => setCount(count + 1)} className={styleBtnArr[typeBtn]}>{button} {count}</button>
        //   <div className="container">
        <blockquote className="blockquote mt-3" key={i} >
            <p className="mb-0 h6">{comments} (<a href="" onClick={() => handleDelete(id)}>delete</a>)</p>
            <footer className="blockquote-footer text-right ">
                {name}
                <cite title="Source Title">(Publish date: {created_at})</cite>

            </footer>
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
