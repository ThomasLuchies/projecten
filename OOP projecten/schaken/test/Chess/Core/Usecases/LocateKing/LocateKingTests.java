package Chess.Core.Usecases.LocateKing;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.King;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

public class LocateKingTests
{
    @Test
    public void canThrowKingNotFound()
    {
        var usecase = new LocateKing();
        assertThrows(LocateKing.KingNotFound.class, () -> usecase.locate(new Board(), Color.white));
    }

    @Test
    public void canReturnKingLocationOnX1Y1() throws LocateKing.KingNotFound, Board.FieldNotFound, Field.NoPieceAvailable
    {
        var usecase = new LocateKing();
        var coords = new Coords(1,1);
        var board = new Board();
        var king = new King(Color.white, board);
        board.setPiece(coords, king);
        assertTrue(coords.equals(usecase.locate(board, king.getColor())));
    }

    @Test
    public void canReturnKingLocationOnX5Y4() throws LocateKing.KingNotFound, Board.FieldNotFound, Field.NoPieceAvailable
    {
        var usecase = new LocateKing();
        var coords = new Coords(5,4);
        var board = new Board();
        var king = new King(Color.white, board);
        board.setPiece(coords, king);
        assertTrue(coords.equals(usecase.locate(board, king.getColor())));
    }

    @Test
    public void canReturnKingLocationOnX6Y8() throws LocateKing.KingNotFound, Board.FieldNotFound, Field.NoPieceAvailable
    {
        var usecase = new LocateKing();
        var coords = new Coords(6,8);
        var board = new Board();
        var king = new King(Color.white, board);
        board.setPiece(coords, king);
        assertTrue(coords.equals(usecase.locate(board, king.getColor())));
    }

    @Test
    public void canThrowKingNotFoundWhenDifferentColor() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var usecase = new LocateKing();
        var coords = new Coords(6,8);
        var board = new Board();
        var king = new King(Color.black, board);
        board.setPiece(coords, king);
        assertThrows(LocateKing.KingNotFound.class, () -> usecase.locate(board, Color.white));
    }
}