## Task Management System Documentation
```perl
task-system/
├── db/
│   └── tasksystem.db           # SQLite Database File
├── src/
│   ├── db.php                  # Database connection
│   ├── task.php                # Task management functions
│   ├── user.php                # User management functions
├── public/
│   ├── index.php               # Main page with calendar and task list
│   ├── admin.php               # Admin page for managing users and tasks
│   └── complete_task.php       # Mark a task as complete
├── css/
│   └── style.css               # Styling for the calendar and task display
└── README.md                   # Project documentation
```

### Goal:
A system where users complete tasks for points. The system handles periodic tasks, rewards, penalties, and has an admin panel for managing users and tasks.

---

### Database Setup:

#### Tables:
- **Users**:
	- `id`: Auto-incrementing primary key.
	- `name`: User's name.
	- `points`: Total points accumulated by the user.
	- `isAdmin`: 0 for regular users, 1 for admin users.

- **Tasks**:
	- `id`: Auto-incrementing primary key.
	- `taskName`: Name of the task.
	- `taskDesc`: Description of the task.
	- `taskRank`: Rank of the task (1-4). Determines task value and penalty.
	- `taskFreq`: Frequency of task (1: Daily, 2: Weekly, 3: Biweekly, 4: Monthly).
	- `value`: 5 * `taskRank` (calculated on insertion).
	- `penalty`: 4 * `taskRank` (calculated on insertion).
	- `last_completed`: Date of last task completion.

#### SQL Schema:
```sql
CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  points INTEGER DEFAULT 0,
  isAdmin INTEGER DEFAULT 0
);

CREATE TABLE tasks (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  taskName TEXT NOT NULL,
  taskDesc TEXT,
  taskRank INTEGER NOT NULL,
  taskFreq INTEGER NOT NULL,
  value INTEGER,
  penalty INTEGER,
  last_completed TEXT
);
```

---

### Task System:

#### Task Ranking & Points:
- **TaskRank**: Determines importance and urgency:
	- 4 = Super Urgent
	- 3 = Mandatory
	- 2 = Medium Priority
	- 1 = Low Priority
- **Task Value**: 5 * `taskRank`.
- **Penalties**: 4 * `taskRank` deducted if the task isn't completed on time.

#### Task Frequency:
- **1** = Daily
- **2** = Weekly
- **3** = Biweekly
- **4** = Monthly

Tasks will be reset based on their frequency and need to be completed again when due.

---

### Admin Features:

- **User Management**: Add, update, and remove users. Admins can modify points and assign tasks.
- **Task Management**: Add, update, and remove tasks, specifying frequency, rank, and description.

#### Admin Page:
- Displays tables for users and tasks.
- Allows admins to manipulate data (add, edit, delete users and tasks).

---

### Frontend:

- **Calendar View**: A calendar interface displays tasks assigned to specific days.
	- Interactable day boxes show tasks when clicked.
- **Task Display**:
	- Tasks are shown on the right, sorted by point value.
	- Limited to 4-5 tasks at a time.
	- Different colors represent different task values, e.g., red for high-value tasks, green for low-value.

---

### Rewards System:

- **Time-Gated Rewards**: Admins can set rewards, some of which are available only at certain times or on a limited basis (e.g., weekly/monthly redeems).
- **Task Completion**: Points are added when tasks are completed. Penalties apply if a task isn't finished by its deadline.
- **Task Recurrence**: Tasks are automatically reset based on their frequency (daily, weekly, etc.).

---

### PHP Operations:

- **Connect to Database**: Establish a connection to the SQLite database.
- **Task and User Management**: Functions to add, fetch, update, and delete tasks and users.
- **Task Completion**: Update `last_completed` when a task is marked as done. Automatically adjust user points based on task value.

---

### Example Task Structure:
```json
{
	"id": 1,
	"taskName": "Complete Project",
	"taskDesc": "Finish the coding project by the end of the week",
	"taskRank": 3,
	"taskFreq": 2
}
```
- `taskRank`: 3 (Mandatory)
- `taskFreq`: 2 (Weekly)
- **Value**: 15 points (5 * 3)
- **Penalty**: 12 points (4 * 3)

---

### Further Enhancements:
- Add a feature to track task completion history.
- Implement user-specific task assignment.
- Incorporate user notifications for upcoming deadlines.
  
---
