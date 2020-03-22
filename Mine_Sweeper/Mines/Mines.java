/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package miny;

/**
 *
 * @author PavelNeumann
 */
public class Mines {

    public int[][] map = new int[5][5];
    private int x;
    private int y;

    public void minegen() {
        for (y = 0; y < 5; y += 1) {
            for (x = 0; x < 5; x++) {
                map[x][y] = (int) (Math.random() * 10);
            }
        }
    }

    public void evaluate() {
        for (y = 0; y < 5; y += 1) {
            for (x = 0; x < 5; x++) {
                if (map[x][y] > 7) {
                    map[x][y] = 9;
                } else {
                    map[x][y] = 0;
                }
            }
        }
    }

    public void count() {
        for (y = 0; y < 5; y += 1) {
            for (x = 0; x < 5; x++) {
                if (map[x][y] != 9) {
                    if (x == 0 && y == 0) {
                        if (map[x + 1][y] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (x == 4 && y == 0) {
                        if (map[x - 1][y] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y + 1] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (x == 0 && y == 4) {
                        if (map[x][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (x == 4 & y == 4) {
                        if (map[x - 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (x == 0 && y > 0 && y < 4) {
                        if (map[x][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y + 1] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (x == 4 && y > 0 && y < 4) {
                        if (map[x][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y + 1] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (y == 0 && x > 0 && x < 4) {
                        if (map[x - 1][y] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (y == 4 && x > 0 && x < 4) {
                        if (map[x - 1][y] == 9) {
                            map[x][y]++;
                        }
                        if (map[x - 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        if (map[x + 1][y] == 9) {
                            map[x][y]++;
                        }
                    }
                    if (y > 0 && y < 4 && x > 0 && x < 4) {
                        // -1,-1
                        if (map[x - 1][y - 1] == 9) {
                            map[x][y]++;
                        }
                        //0,-1
                        if (map[x][y - 1] == 9) {
                            map[x][y]++;
                        }

                        //+1,-1
                        if (map[x + 1][y - 1] == 9) {
                            map[x][y]++;
                        }

                        //-1,0
                        if (map[x - 1][y] == 9) {
                            map[x][y]++;
                        }

                        //1,0
                        if (map[x + 1][y] == 9) {
                            map[x][y]++;
                        }

                        //-1,1
                        if (map[x - 1][y + 1] == 9) {
                            map[x][y]++;
                        }

                        //0,1
                        if (map[x][y + 1] == 9) {
                            map[x][y]++;
                        }

                        //1,1
                        if (map[x + 1][y + 1] == 9) {
                            map[x][y]++;
                        }
                    }
                }
            }
        }
    }

    public void draw() {
        for (y = 0; y < 5; y += 1) {
            System.out.println();
            for (x = 0; x < 5; x++) {
                System.out.print(map[x][y]);
            }
        }
    }

}