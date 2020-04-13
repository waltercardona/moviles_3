import express from 'express';
import controller from '../Controllers/ProjectController'

const router = express.Router();

router.get('/listtasks', controller.listTasks);
router.get('/gettask', controller.getTask);
router.post('/addtask', controller.addTask);
router.post('/deletetask', controller.deleteTask);
router.post('/updatetask', controller.updateTask);
//router.get('/data', controller.data);

module.exports = router;