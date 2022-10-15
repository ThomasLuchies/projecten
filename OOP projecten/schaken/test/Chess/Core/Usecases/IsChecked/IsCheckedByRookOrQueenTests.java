package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.King;
import Chess.Core.Pieces.Rook;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertTrue;

public class IsCheckedByRookOrQueenTests
{
    private IsCheckedByRookOrQueen usecase;

    @BeforeEach
    public void beforeEach()
    {
        usecase = new IsCheckedByRookOrQueen();
    }

    @Test
    public void returnsTrueWhenRookRightFromKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var rook = new Rook(Color.black, board);
        board.setPiece(new Coords(2,1), king);
        board.setPiece(new Coords(8,1), rook);
        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenRookLeftFromKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var rook = new Rook(Color.black, board);
        board.setPiece(new Coords(8,1), king);
        board.setPiece(new Coords(2,1), rook);
        assertTrue(usecase.execute(board, Color.white));
    }

    @Test
    public void returnsTrueWhenRookAboveKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var rook = new Rook(Color.white, board);
        board.setPiece(new Coords(2,1), king);
        board.setPiece(new Coords(2,8), rook);
        assertTrue(usecase.execute(board, Color.black));
    }

    @Test
    public void returnsTrueWhenRookUnderKing() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.black, board);
        var rook = new Rook(Color.white, board);
        board.setPiece(new Coords(8,8), king);
        board.setPiece(new Coords(8,1), rook);
        assertTrue(usecase.execute(board, Color.black));
    }
}