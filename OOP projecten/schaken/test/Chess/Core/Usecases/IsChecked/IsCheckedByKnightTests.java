package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.King;
import Chess.Core.Pieces.Knight;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class IsCheckedByKnightTests
{
    private IsCheckedByKnight usecase;

    @BeforeEach
    public void beforeEach()
    {
        usecase = new IsCheckedByKnight();
    }

    @Test
    public void returnsTrueWhenKnightAboveLeftKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var knight = new Knight(Color.white, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(3,7), knight);

        assertTrue(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsTrueWhenKnightLeftAboveKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(2,6), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenKnightUnderLeftKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(3,3), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenKnightLeftUnderKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(2,4), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenKnightAboveRightKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(5,7), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenKnightRightAboveKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(6,6), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenKnightUnderRightKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(5,3), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenKnightRightUnderKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var knight = new Knight(Color.black, board);

        board.setPiece(new Coords(4,5), king);
        board.setPiece(new Coords(6,4), knight);

        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsFalseWhenNoKnightIsFound() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        board.setPiece(new Coords(4,5), king);
        assertFalse(usecase.execute(board, Color.white));
    }
}