import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import Comment from './Comment/Comment';
import Form from './Comment/Form';

export default function Main() {
    const [data, setData] = useState([]);
    const [news, setNews] = useState([]);
    const [loading, setLoading] = useState(true);
    const [err, setErro] = useState(1);


    useEffect(() => {
        getItemList();
    }, []);

    const getItemList = () => {
        const url = window.location.pathname.split('/').pop();
        fetch('/comment/' + url)
            .then(response => {
                return response.json();
            })
            .then(dataX => {
                setNews(url);
                setData(dataX.reverse());
                setLoading(false);
            })
            .catch(error => {
                setErro(error);
                console.log('3343', error);
            });
    }

    const handleSubmit = (event) => {
        event.preventDefault();
        const data = new FormData(event.target);
        const crsf = document.getElementsByName('csrf-token')[0].content;
        data.append('_token', crsf)

        fetch('/comment', {
            method: 'POST',
            body: data
        }).then(response => {
            if (response.status === 200) {
                // console.log('Success');
                getItemList();
            }
        });
        // setComment('');
    }

    return (
        <div className="container">
            <h2>React Comment</h2>
            <Form handleSubmit={handleSubmit} news={news} />
            <h5>{loading ? 'Comments loading' : ''}</h5>
            <h1>{err != 1 ? 'Error  connection: '.err : ''}</h1>
            {data.map(({ name, comment }, i) => (
                <Comment comments={comment} name={name} key={i} />
            ))}

        </div>
    )
};
