import React, { Component } from 'react';

class Navigation extends Component {
    constructor(props) {
        super(props);
        this.Today = this.Today.bind(this);
        this.Previus = this.Previus.bind(this);
        this.Next = this.Next.bind(this);
    }
    Today(){
    }
    Previus(){
    }
    Next(){
    }
    render() {
        return (
            <div className="calendar-header">
                <button className="btn btn-defalt today"  onClick={this.Today}>Today</button>
                <button className="btn btn-defalt previus"  onClick={this.Previus}>Previus</button>
                <button className="btn btn-defalt next"  onClick={this.Next}>Next</button>
            </div>
        );
    }
}
class Panel extends Component {
    render() {
        return (
            <div ClassName="panel">
                <table className="table table-bordered">
                    <thead>
                        <tr>
                            <td></td>
                            <td>05.12</td>
                            <td>06.12</td>
                            <td>07.12</td>
                            <td>08.12</td>
                            <td>09.12</td>
                            <td>10.12</td>
                            <td>11.12</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>00:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        )
    }
}

class Calendar extends Component {
    constructor(props) {
        super(props);
        this.state = {
            week: ''
        }
    }
    render() {
        return (
            <div>
                <Navigation />
                <Panel />
            </div>
        );
    }
}

export default Calendar;