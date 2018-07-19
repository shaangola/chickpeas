import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Button from '@material-ui/core/Button';
import Modal from "./modal"
export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an example component!
                                <Button variant="contained" color="primary" className="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                                    Hello World
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
                <Modal/>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
