package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.King;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class IsCheckedByWhitePawnTests
{
    private IsCheckedByWhitePawn usecase;

    @BeforeEach
    public void beforeEach()
    {
        usecase = new IsCheckedByWhitePawn();
    }

    @Test
    public void returnsFalseWhenNothingAttacks() throws Board.FieldNotFound, Field.NoPieceAvailable, LocateKing.KingNotFound
    {
        var board = new Board();
        var king = new King(Color.black, board);
        board.setPiece(new Coords(1,1), king);
        assertFalse(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsTrueWhenKingAtX8Y4_andPawnAtX7Y3() throws Board.FieldNotFound, Field.NoPieceAvailable, LocateKing.KingNotFound
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var pawn = new Pawn(Color.white, board);
        board.setPiece(new Coords(8,4), king);
        board.setPiece(new Coords(7,3), pawn);
        assertTrue(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsTrueWhenKingAtX1Y4_andPawnAtX2Y3() throws Board.FieldNotFound, Field.NoPieceAvailable, LocateKing.KingNotFound
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var pawn = new Pawn(Color.white, board);
        board.setPiece(new Coords(1,4), king);
        board.setPiece(new Coords(2,3), pawn);
        assertTrue(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsFalseWhenKingIsWhite() throws Board.FieldNotFound, Field.NoPieceAvailable, LocateKing.KingNotFound
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var pawn = new Pawn(Color.black, board);
        board.setPiece(new Coords(1,4), king);
        board.setPiece(new Coords(2,3), pawn);
        assertFalse(usecase.execute(board, Color.white));
    }
}