import React, { Component } from 'react';
import SortableTree from 'react-sortable-tree';

export default class TreeView extends Component {
    constructor(props) {
        super(props);

        this.state = {
            treeData: this.props.treeData,
        };
    }

    render() {
        return (
            <div>
                <form style={{ height: 400 }}>
                    <input type={"hidden"} name={"contents"}/>
                    <SortableTree
                        treeData={this.state.treeData}
                        onChange={treeData => this.setState({ treeData })}
                        generateNodeProps={rowInfo => ({
                            buttons: [
                                <a
                                    className="btn btn-primary"
                                    href={'/admin/sfadless/cmf/content/' + rowInfo.node.id + '/edit'}
                                >
                                    <i className="fa fa-pencil" aria-hidden="true"/>
                                </a>,
                                <a
                                    className="btn btn-success"
                                    href={'/admin/sfadless/cmf/content/create?parentId=' + rowInfo.node.id}
                                    style={{"marginLeft":"2px"}}
                                >
                                    <i className="fa fa-plus" aria-hidden="true"/>
                                </a>,
                            ],
                        })}
                    />
                    <button className={"btn btn-success"}>Обновить</button>
                </form>
            </div>
        );
    }
}