import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Main from './Main';


export default class App extends Component {
    render() {
        return (
            <Main />
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<App />, document.getElementById('example'));
}
