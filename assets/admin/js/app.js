import React from 'react';
import ReactDom from 'react-dom'
import TreeView from './Tree.js';
import 'react-sortable-tree/style.css';

const rootElement = document.getElementById('tree');
const treeData = JSON.parse(document.getElementById('data-container').dataset.content);

ReactDom.render(
    <TreeView treeData={treeData}/>,
    rootElement
);