let canvasWidth = 800;
let canvasHeight = 640;
let tile_size = 1;
let grid = [];
let cols = canvasWidth / tile_size;
let rows =  canvasHeight / tile_size;

let colors = [
    '#00FFFF',
    '#F0E68C',
    '#7FFF00',
    '#006400',
    '#808080',
    '#FFFFFF',
];


function setup() {
    createCanvas(canvasWidth, canvasHeight);

    for (let j = 0; j <= rows; j++) {
        let row = [];
        for (let i = 0; i <= cols; i++) {
            let tile = new Tile(i, j);
            row.push(tile);
        }
        grid.push(row);
    }
}

function draw() {
    for (let j = 0; j < grid.length; j++) {
        for (let i = 0; i < grid[j].length; i++) {
            grid[j][i].show();
        }
    }
}

class Tile {
    constructor(i, j) {
        this.i = i;
        this.j = j;
        this.x = i * tile_size;
        this.y = j * tile_size;
        this.height = map[j][i];
        this.color = colors[this.height];

        switch(true) {
            case this.height == 0:
                this.biome = 'water';
                break;
            case this.height == 1:
                this.biome = 'beach';
                break;
            case this.height == 2:
                this.biome = 'land';
                break;
            case this.height == 3:
                this.biome = 'forest';
                break;
            case this.height == 4:
                this.biome = 'mountain';
                break;
            case this.height == 5:
                this.biome = 'snow';
                break;
        }
    }

    show() {
        noStroke();
        fill(this.color);
        rect(this.x, this.y, tile_size, tile_size);
    };
}