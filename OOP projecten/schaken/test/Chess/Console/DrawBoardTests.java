package Chess.Console;

import Chess.Core.*;
import Chess.Core.Pieces.*;
import org.junit.jupiter.api.Test;

import java.util.ArrayList;
import java.util.HashSet;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class DrawBoardTests
{
    @Test
    public void canDrawBoard() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var drawBoard = new DrawBoard();
        var board = new Board();
        board.reset((pawn, location) -> {});
        var drawnBoard =    "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "8 |  (R)  |  (N)  |  (B)  |  (Q)  |  (K)  |  (B)  |  (N)  |  (R)  |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "7 |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "6 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "5 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "4 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "3 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "2 |   P   |   P   |   P   |   P   |   P   |   P   |   P   |   P   |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "1 |   R   |   N   |   B   |   Q   |   K   |   B   |   N   |   R   |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "      a       b       c       d       e       f       g       h";
        assertEquals(drawnBoard, drawBoard.draw(board, new HashSet<>(), new ArrayList<>()));
    }

    @Test
    public void canDrawBoardWithAvailableMoves() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var drawBoard = new DrawBoard();
        var board = new Board();
        board.reset((pawn, location) -> {});
        var coords = new HashSet<Coords>();
        coords.add(new Coords(7,2));
        var drawnBoard =    "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "8 |  (R)  |  (N)  |  (B)  |  (Q)  |  (K)  |  (B)  |  (N)  |  (R)  |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "7 |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "6 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "5 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "4 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "3 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       | *   * |       |\n" +
                            "2 |   P   |   P   |   P   |   P   |   P   |   P   |   P   |   P   |\n" +
                            "  |       |       |       |       |       |       | *   * |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "1 |   R   |   N   |   B   |   Q   |   K   |   B   |   N   |   R   |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "      a       b       c       d       e       f       g       h";
        assertEquals(drawnBoard, drawBoard.draw(board, coords, new ArrayList<>()));
    }

    @Test
    public void canDrawBoardWithAvailableMovesAndTakenPieces() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var drawBoard = new DrawBoard();
        var board = new Board();
        board.reset((pawn, location) -> {});
        var coords = new HashSet<Coords>();
        coords.add(new Coords(7,2));
        var takenPieces = new ArrayList<Piece>();
        takenPieces.add(new King(Color.black, null));
        takenPieces.add(new Queen(Color.black, null));
        takenPieces.add(new Queen(Color.white, null));
        takenPieces.add(new Rook(Color.black, null));
        var drawnBoard =    "  +-------+-------+-------+-------+-------+-------+-------+-------+  Taken pieces: (K) (Q) Q (R)\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "8 |  (R)  |  (N)  |  (B)  |  (Q)  |  (K)  |  (B)  |  (N)  |  (R)  |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "7 |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "6 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "5 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "4 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "3 |       |       |       |       |       |       |       |       |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       | *   * |       |\n" +
                            "2 |   P   |   P   |   P   |   P   |   P   |   P   |   P   |   P   |\n" +
                            "  |       |       |       |       |       |       | *   * |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "1 |   R   |   N   |   B   |   Q   |   K   |   B   |   N   |   R   |\n" +
                            "  |       |       |       |       |       |       |       |       |\n" +
                            "  +-------+-------+-------+-------+-------+-------+-------+-------+\n" +
                            "      a       b       c       d       e       f       g       h";
        assertEquals(drawnBoard, drawBoard.draw(board, coords, takenPieces));
    }
}