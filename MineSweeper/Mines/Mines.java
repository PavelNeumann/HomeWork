import java.util.Random;

class Mines {
    int Width = 30;
    int Height = 10;
    int Mines = 20;
    char[][] Minefield;

    public Mines() {
        System.out.println("Generování pole");

        Minefield = new char[Height][Width];

        System.out.println("Vynulování");

        clearMinefield();

        System.out.println("Rozhození min");

        placeMines();

        drawMinefield();
    }

    public void placeMines() {
        int minesPlaced = 0;
        Random random = new Random();
        while (minesPlaced < Mines) {
            int x = random.nextInt(Width);
            int y = random.nextInt(Height);

            if (Minefield[y][x] != '*') {
                Minefield[y][x] = '*';
                minesPlaced++;
            }
        }
    }

    public void clearField() {
        for (int y = 0; y < Height; y++) {
            for (int x = 0; x < Width; x++) {
                Minefield[y][x] = ' ';
            }
        }
    }

    public void drawField() {
        for (int y = 0; y < Height; y++) {
            for (int x = 0; x < Width; x++) {
                System.out.print(Minefield[y][x]);
            }
            System.out.print("\n");
        }
    }

    public static void main(String[] args) {
        Mines mines = new Mines();
    }
}