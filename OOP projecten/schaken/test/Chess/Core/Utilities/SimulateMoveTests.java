package Chess.Core.Utilities;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.DummyPiece;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class SimulateMoveTests
{
    @Test
    public void canSimulateMove() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var utility = new SimulateMove();
        var board = new Board();
        board.setPiece(new Coords(4,4), new DummyPiece(Color.white));
        var newBoard = utility.simulate(board, new Coords(4,4), new Coords(8,8));
        assertFalse(newBoard.pieceOnField(new Coords(4,4)));
        assertTrue(newBoard.pieceOnField(new Coords(8,8)));
        assertTrue(board.pieceOnField(new Coords(4,4)));
        assertFalse(board.pieceOnField(new Coords(8,8)));
    }
}