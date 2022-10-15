package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Bischop;
import Chess.Core.Pieces.King;
import Chess.Core.Pieces.Knight;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class IsCheckedByBischopOrQueenTests
{
    private IsCheckedByBischopOrQueen usecase;

    @BeforeEach
    public void beforeEach()
    {
        usecase = new IsCheckedByBischopOrQueen();
    }

    @Test
    public void returnsTrueWhenBischopLeftAboveKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var bischop = new Bischop(Color.white, board);
        board.setPiece(new Coords(7,4), king);
        board.setPiece(new Coords(3,8), bischop);
        assertTrue(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsTrueWhenBischopLeftUnderKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var bischop = new Bischop(Color.white, board);
        board.setPiece(new Coords(7,8), king);
        board.setPiece(new Coords(3,4), bischop);
        assertTrue(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsTrueWhenBischopRightAboveKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var bischop = new Bischop(Color.black, board);
        board.setPiece(new Coords(1,2), king);
        board.setPiece(new Coords(5,6), bischop);
        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenBischopRightUnderKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var bischop = new Bischop(Color.black, board);
        board.setPiece(new Coords(3,7), king);
        board.setPiece(new Coords(7,3), bischop);
        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsFalseWhenAnotherPieceIsBlocking() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var anotherPiece = new Knight(Color.black, board);
        var bischop = new Bischop(Color.black, board);
        board.setPiece(new Coords(3,7), king);
        board.setPiece(new Coords(5,5), anotherPiece);
        board.setPiece(new Coords(7,3), bischop);
        assertFalse(usecase.execute(board, Color.white));
    }
}