// Theme Toggle
const toggleButton = document.getElementById('theme-toggle');
toggleButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme'); // Toggle dark-theme class on the body
});

// Puzzle Drag and Drop Logic
let startTime;
const puzzleContainer = document.getElementById('puzzle-container');

// Load Puzzle Pieces Dynamically
const totalPieces = 15; // Total pieces (5x3 grid)
for (let i = 1; i <= totalPieces; i++) {
    const piece = document.createElement('img');
    piece.src = `piece${i}.png`; // Ensure your images are named piece1.png to piece15.png
    piece.draggable = true;
    piece.classList.add('puzzle-piece');
    piece.setAttribute('data-position', i); // Set correct position
    puzzleContainer.appendChild(piece);
}

// Drag-and-Drop Logic
let draggedPiece = null;

puzzleContainer.addEventListener('dragstart', (e) => {
    if (e.target.classList.contains('puzzle-piece')) {
        draggedPiece = e.target;
        setTimeout(() => (draggedPiece.style.opacity = "0.5"), 0);
    }
});

puzzleContainer.addEventListener('dragend', () => {
    if (draggedPiece) {
        draggedPiece.style.opacity = "1";
        draggedPiece = null;
    }
});

puzzleContainer.addEventListener('dragover', (e) => {
    e.preventDefault(); // Allow drop
});

puzzleContainer.addEventListener('drop', (e) => {
    e.preventDefault();
    const target = e.target;

    if (target && target.classList.contains('puzzle-piece')) {
        // Swap image sources
        const draggedSrc = draggedPiece.src;
        draggedPiece.src = target.src;
        target.src = draggedSrc;

        // Swap data positions
        const draggedPosition = draggedPiece.getAttribute('data-position');
        const targetPosition = target.getAttribute('data-position');
        draggedPiece.setAttribute('data-position', targetPosition);
        target.setAttribute('data-position', draggedPosition);

        // Start Timer on First Drag
        if (!startTime) {
            startTime = Date.now();
        }
    }
});

// Check Completion
document.getElementById('save-result').addEventListener('click', () => {
    const pieces = document.querySelectorAll('.puzzle-piece');
    let isCorrect = true;

    pieces.forEach((piece, index) => {
        const expectedPosition = index + 1;
        const actualPosition = parseInt(piece.getAttribute('data-position'), 10);

        if (expectedPosition !== actualPosition) {
            isCorrect = false;
        }
    });

    if (isCorrect) {
        alert('Puzzle completed correctly!');
        const userName = document.getElementById('user-name').value;
        const completionTime = startTime ? (Date.now() - startTime) / 1000 : 0;

        fetch('save-result.php', {
            method: 'POST',
            body: JSON.stringify({ name: userName, time: completionTime }),
            headers: { 'Content-Type': 'application/json' }
        })
            .then((response) => response.text())
            .then((data) => alert(data))
            .catch((error) => console.error('Error saving result:', error));
    } else {
        alert('The puzzle is not correctly completed yet.');
    }
});

// Accordion Functionality
document.querySelectorAll('.accordion-item h3').forEach((header) => {
    header.addEventListener('click', () => {
        const content = header.nextElementSibling;
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            document.querySelectorAll('.accordion .content').forEach((item) => {
                item.style.display = 'none';
            });
            content.style.display = 'block';
        }
    });
});

// Debugging Log
console.log("JavaScript is working");