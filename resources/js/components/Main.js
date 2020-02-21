import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import Comment from './Comment/Comment';
import Form from './Comment/Form';

export default function Main() {
    const [data, setData] = useState([]);
    const [news, setNews] = useState([]);
    const [success, setSuccess] = useState(0);
    const [loading, setLoading] = useState(true);
    const [err, setErro] = useState(1);
    const CSRF = document.getElementsByName('csrf-token')[0].content;


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
        data.append('_token', CSRF)

        fetch('/comment', {
            method: 'POST',
            body: data
        }).then(response => {
            if (response.status === 200) {
                // console.log('Success');
                getItemList();
                setSuccess(1);
                setTimeout(() => { setSuccess(0) }, 2000);
            }
        });
        // setComment('');
    }

    const handleDelete = (id) => {
        event.preventDefault();
        fetch('/comment/' + id, {
            method: 'DELETE',
            headers: {
                "X-CSRF-TOKEN": CSRF
            }
        }).then(response => {
            if (response.status === 200) {
                getItemList();
            }
            return response.json()
        })
            .catch(error => { console.log(error) });
    };

    function Alert() {
        return (<div className="alert alert-success" role="alert">Comment added</div>);
    };

    return (
        <div className="container col-10">
            <h2>React Comment (count: {data.length})</h2>
            {success === 1 ? <Alert /> : ''}
            <Form handleSubmit={handleSubmit} news={news} />
            <h5>{loading ? 'Comments loading' : ''}</h5>
            <h1>{err != 1 ? 'Error  connection: '.err : ''}</h1>
            <h5>Comments list</h5>
            {data.map(({ id, name, comment, created_at }, i) => (
                <Comment comments={comment} name={name} id={id} key={i} handleDelete={handleDelete} created_at={created_at} />
            ))}

        </div>
    )
};
