import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import ApiCaller from './ApiCaller.js';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React</h1>
        </header>
        <p className="App-intro">
          To get started, edit <code>src/App.js</code> and save to reload.
        </p>
        <h3>What is this?</h3>
        <p>This is a REACT app on localhost:3000 calling and lumen api on localhost:8000.</p>
        <ApiCaller></ApiCaller>
      </div>
    );
  }
}

export default App;
