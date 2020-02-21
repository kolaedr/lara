import React, { Component, useState, useEffect } from 'react';
import ReactDOM from 'react-dom';

export default function Form(prop) {
    const { news, handleSubmit } = prop;
    const [name, setName] = useState('Ivan');
    const [comment, setComment] = useState('');




    return (
        <form onSubmit={(event) => handleSubmit(event)} >

            <div className="form-group">
                <label htmlFor="comment">Text comments
             <textarea
                        className="form-control"
                        name="comment"
                        id="comment"
                        placeholder="Write your comment"
                        value={comment}
                        onChange={(event) => setComment(event.target.value)}
                    />
                </label>
            </div>
            <div className="form-inline">
                <div className="form-group col-8">
                    <label htmlFor="name">Your name
                    <input
                            type="text"
                            className="col-md-4 form-control ml-2"
                            name="name"
                            id="name"
                            placeholder="Your name"
                            value={name}
                            onChange={(event) => setName(event.target.value)} />
                    </label>
                </div>
            </div>
            <input type="hidden" name="news" value={news} />
            <button type="submit" className="btn btn-secondary  col-4">Add comment</button>
        </form>
    )
};
