
import React, { Component } from 'react';


class ApiCaller extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        error: null,
        isLoaded: false,
        items: []
      };
      console.log('props:',props);
    }
    componentDidMount() {
      fetch(this.props.endpoint)
        .then(res => res.json())
        .then(
          (result) => {
            console.log('result:',result);
            this.setState({
              isLoaded: true,
              items: result.data
            });
          },
          // Note: it's important to handle errors here
          // instead of a catch() block so that we don't swallow
          // exceptions from actual bugs in components.
          (error) => {
            this.setState({
              isLoaded: true,
              error
            });
          }
        )
        console.log(this.state)
    }
  
    render() {
      const { error, isLoaded, items } = this.state;
      if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        return (
         <div className='ajaxresults'>
          <ul>
          {items.map(item => (
            <li key={item.id}>
             <h3>Name:{item.name}</h3><p>Address:{item.address}</p>
             <p>Profession:{item.profession}</p>
             <p>REQUEST_METHOD:{item.REQUEST_METHOD}</p>
             <p>REQUEST_TIME:{item.REQUEST_TIME}</p>
             <p>REQUEST_URI:{item.REQUEST_URI}</p>
             <p>REQUEST_CONTENT_TYPE:{item.REQUEST_CONTENT_TYPE}</p>
            </li>
          ))}
        </ul>
        </div>
        );
      }
    }
  }

  export default ApiCaller;
  /*

import React, { Component } from 'react';


class ApiCaller extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        error: null,
        isLoaded: false,
        items: []
      };
    }
  
    componentDidMount() {
      fetch("https://reqres.in/api/users?page=2")
        .then(res => res.json())
        .then(
          (result) => {
            this.setState({
              isLoaded: true,
              items: result.data
            });
          },
          // Note: it's important to handle errors here
          // instead of a catch() block so that we don't swallow
          // exceptions from actual bugs in components.
          (error) => {
            this.setState({
              isLoaded: true,
              error
            });
          }
        )
        console.log(this.state.items);
    }
  
    render() {
      const { error, isLoaded, items } = this.state;
      if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        return (
         
          <ul>
          {items.map(item => (
            <li key={item.last_name}>
              {item.last_name} {item.first_name}
            </li>
          ))}
        </ul>
        );
      }
    }
  }

  export default ApiCaller;
  */