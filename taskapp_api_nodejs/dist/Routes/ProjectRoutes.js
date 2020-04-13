'use strict';

var _express = require('express');

var _express2 = _interopRequireDefault(_express);

var _ProjectController = require('../Controllers/ProjectController');

var _ProjectController2 = _interopRequireDefault(_ProjectController);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var router = _express2.default.Router();

router.get('/listtasks', _ProjectController2.default.listTasks);
router.get('/gettask', _ProjectController2.default.getTask);
router.post('/addtask', _ProjectController2.default.addTask);
router.post('/deletetask', _ProjectController2.default.deleteTask);
router.post('/updatetask', _ProjectController2.default.updateTask);
//router.get('/data', controller.data);

module.exports = router;