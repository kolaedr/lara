import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';

export default function Form(prop) {
    const { news, handleSubmit } = prop;
    const [name, setName] = useState('Ivan');
    const [comment, setComment] = useState('');

    const clearForm=()=>{
        setComment('');
    };


    return (
        <form onSubmit={(event) => {handleSubmit(event); clearForm()}} className="mb-3">

            <div className="form-group">
                <label htmlFor="comment">Text comments</label>
             <textarea
                        className="form-control"
                        name="comment"
                        id="comment"
                        placeholder="Write your comment"
                        value={comment}
                        onChange={(event) => setComment(event.target.value)}
                    />

            </div>
            <div className="form-inline">
                <div className="form-group col-8">
                    <label htmlFor="name">Your name</label>
                    <input
                            type="text"
                            className="col-md-4 form-control ml-2"
                            name="name"
                            id="name"
                            placeholder="Your name"
                            value={name}
                            onChange={(event) => setName(event.target.value)} />

                </div>
                <button type="submit" className="btn btn-secondary  col-4">Add comment</button>
            </div>
            <input type="hidden" name="news" value={news} />

        </form>
    )
};
